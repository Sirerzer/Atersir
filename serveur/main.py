import socket
import threading
import select

# Adresse IP et numéro de port du serveur (même machine locale)
ip_serveur = "87.98.251.177"
port_serveur = 12345
port_commandes = 12346

# Nombre de connexions à accepter
nombre_connexions = 10

# Création d'une liste pour stocker les threads des clients
threads_clients = []

# Création d'une liste pour stocker les connexions des clients
connexions_clients = []

# Création d'un dictionnaire pour stocker les adresses IP des clients
clients_ips = {}

# Création du socket pour les commandes
sock_commandes = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
sock_commandes.bind((ip_serveur, port_commandes))
sock_commandes.listen(1)

# Fonction exécutée par chaque thread client
def gerer_client(conn, addr, index):
    while True:
        # Vérification des connexions des clients
        sockets_a_lire, _, _ = select.select([conn] + connexions_clients + [sock_commandes], [], [])

        for socket_actif in sockets_a_lire:
            if socket_actif == conn:
                # Réception des données du client
                data = socket_actif.recv(1024).decode()

                if not data:
                    # Si aucune donnée n'est reçue, la connexion est fermée par le client
          
                    return

                # Affichage des données reçues
                print("Données reçues du client", addr, ":", data)

                # Envoi des données reçues à tous les autres clients
                for i, client_conn in enumerate(connexions_clients):
                    if i != index:
                        try:
                            client_conn.send(data.encode())
                        except:
                            # En cas d'erreur d'envoi, supprimer la connexion du client
                   
                            return
   
  





# Création du socket
sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

# Liaison du socket à l'adresse IP et au numéro de port
sock.bind((ip_serveur, port_serveur))

# Attente de connexions
sock.listen(nombre_connexions)
print("En attente de", nombre_connexions, "connexions...")

while len(threads_clients) < nombre_connexions:
    # Accepter la connexion du client
    conn, addr = sock.accept()
    print("Connexion acceptée depuis :", addr)

    # Ajout de la connexion du client à la liste des connexions
    connexions_clients.append(conn)

    # Ajout de l'adresse IP du client au dictionnaire des adresses IP
    clients_ips[len(threads_clients)] = addr[0]

    # Création d'un thread client pour gérer la connexion
    client_thread = threading.Thread(target=gerer_client, args=(conn, addr, len(threads_clients)))

    # Démarrage du thread client
    client_thread.start()

    # Ajout du thread client à la liste
    threads_clients.append(client_thread)

# Attendre la fin de tous les threads clients
for client_thread in threads_clients:
    client_thread.join()

# Fermeture des sockets
sock.close()
sock_commandes.close()
