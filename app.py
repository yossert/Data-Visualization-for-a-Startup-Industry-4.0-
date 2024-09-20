from flask import Flask, jsonify, render_template
import paho.mqtt.client as mqtt
import pymysql

app = Flask(__name__)

# Configuration MQTT
broker_address = "localhost"  # Adresse du broker Mosquitto
client = mqtt.Client("SensorSubscriber")

# Configuration de la base de données MySQL
db = pymysql.connect(
    host='localhost',
    user='root',
    password='',
    db='miniprojet'  # Nom de votre base de données
)

# Callback pour traiter les messages MQTT
def on_message(client, userdata, message):
    try:
        valeur_capteur = float(message.payload)  # Convertir la valeur reçue en float
        inserer_donnees_humidite(valeur_capteur)
        print(f"Valeur MQTT reçue : {valeur_capteur}")
    except Exception as e:
        print(f"Erreur lors de la réception de données MQTT : {str(e)}")
# Connexion au broker MQTT
client.on_message = on_message

client.connect(broker_address)
client.subscribe("sensor/data")

# Insérer des données dans la table "humidite" avec la date actuelle
# Insérer des données dans la table "humidite" avec la date actuelle
def inserer_donnees_humidite(valeur):
    try:
        cursor = db.cursor()
        sql = "INSERT INTO humidite (date, valeur) VALUES (NOW(), %s)"
        cursor.execute(sql, (valeur,))
        db.commit()
        cursor.close()
        print(f"Donnée insérée avec succès : {valeur}")
    except Exception as e:
        print(f"Erreur lors de l'insertion de données dans la base de données : {str(e)}")


@app.route("/get-sensor-data", methods=["GET"])
def get_sensor_data():
    try:
        cursor = db.cursor()
        cursor.execute("SELECT valeur FROM humidite")
        data = cursor.fetchall()  # Récupérer toutes les valeurs de la table
        cursor.close()
        return jsonify(data)
    except Exception as e:
        return jsonify({"error": "Erreur lors de la récupération des données : " + str(e)})




@app.route("/", methods=["GET"])
def home():
    try:
        cursor = db.cursor()
        cursor.execute("SELECT valeur FROM humidite")
        data = cursor.fetchall()  # Récupérer toutes les valeurs de la table
        cursor.close()
        return render_template("index.html", sensor_data=data)
    except Exception as e:
        return jsonify({"error": "Erreur lors de la récupération des données : " + str(e)})


if __name__ == "__main__":
    client.loop_start()  # Démarrer la boucle MQTT
    app.run()
