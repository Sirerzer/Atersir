import os
import requests
import zipfile
import yaml
import tkinter as tk
from tkinter import messagebox

# Fonction pour extraire et afficher les informations du plugin.yml
def process_plugin_zip(zip_path):
    with zipfile.ZipFile(zip_path, 'r') as zip_ref:
        # Chercher et extraire le fichier plugin.yml
        plugin_yml = [file for file in zip_ref.namelist() if file.endswith("plugin.yml")]
        if not plugin_yml:
            return
        plugin_yml_path = plugin_yml[0]
        zip_ref.extract(plugin_yml_path)
        
        # Charger le contenu de plugin.yml
        with open(plugin_yml_path, 'r') as yml_file:
            plugin_data = yaml.safe_load(yml_file)

            # Récupérer les informations nécessaires
            name = plugin_data.get('name', 'N/A')
            icon = plugin_data.get('icon', 'N/A')
            description = plugin_data.get('description', 'N/A')
            version = plugin_data.get('version', 'N/A')

            # Afficher les informations dans l'interface graphique
            result_text.config(state=tk.NORMAL)
            result_text.insert(tk.END, f"Name: {name}\nIcon: {icon}\nDescription: {description}\nVersion: {version}\n\n")
            result_text.config(state=tk.DISABLED)

        # Supprimer le fichier plugin.yml extrait
        os.remove(plugin_yml_path)

# Fonction pour télécharger et traiter les fichiers .zip
def process_zip_files():
    response = requests.get(url_entry.get())
    if response.status_code == 200:
        file_links = response.text.split('\n')
        zip_links = [file_link for file_link in file_links if file_link.endswith('.zip')]

        for zip_link in zip_links:
            zip_file = requests.get(zip_link)
            with open('temp.zip', 'wb') as f:
                f.write(zip_file.content)
            process_plugin_zip('temp.zip')
            os.remove('temp.zip')

        messagebox.showinfo("Process Completed", "Processing of .zip files is complete.")
    else:
        messagebox.showerror("Error", "Failed to retrieve file links.")

# Créer la fenêtre principale
root = tk.Tk()
root.title("Plugin Info Extractor")

# Créer et placer les widgets
url_label = tk.Label(root, text="URL:")
url_label.pack()

url_entry = tk.Entry(root, width=50)
url_entry.pack()

process_button = tk.Button(root, text="Process .zip Files", command=process_zip_files)
process_button.pack()

result_text = tk.Text(root, height=10, width=50, state=tk.DISABLED)
result_text.pack()

# Lancer la boucle principale
root.mainloop()
