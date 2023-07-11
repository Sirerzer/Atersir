from tkinter import *
import socket
import threading
import time
import os
import panel
root = Tk()
root.title("panel admin D'atersir")
root.geometry("1080x850")
root.configure(background="#252526")

def recuperreleschamps():
  
    test_user_id_admin = user_id.get()
    test_mdp = mdp.get()
    if test_user_id_admin == "Admin":
        a = 1
   
    if(test_user_id_admin != "Admin"):
        fake_admin_name = Label(root,text="Nom dutilisateur ou mod de passe incorecte",fg='#fff',bg="#f00")
        fake_admin_name.pack()
        a = 0
        
    if test_mdp == "Admin1234":
        if(a != 0):
            reel_mdp = Label(root,text="vous etes conectez redirection ver le panel en cours",fg='#f00',bg="#32CD32")
            reel_mdp.pack()
            time.sleep(3)
            label.destroy()
            label.destroy()
            label.destroy()
            label.destroy()
            label.destroy()
            label.destroy()
            user_id.destroy()
            mdp.destroy()

            button.destroy()

label = Label(root,text="Bienvenue sur le panel Administeur",fg='#f00',bg="#252526")
label.pack()
label = Label(root,text="Merci de vous connectez",fg='#f00',bg="#252526")
label.pack()
label = Label(root,text="Nom d'utilisateur",bg="#252526")
label.pack()
user_id = Entry(root,bg="#fff")
user_id.pack()
label = Label(root,text="Mot de passe",bg="#252526")
label.pack()
mdp = Entry(root,bg="#252526",show = '•')
mdp.pack()
button = Button(root,text="Verifier",command=recuperreleschamps)
button.pack()
root.mainloop()