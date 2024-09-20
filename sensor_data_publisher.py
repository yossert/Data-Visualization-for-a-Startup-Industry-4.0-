import paho.mqtt.client as mqtt
import random
import time

# Configuration MQTT
broker_address = "localhost"  # Adresse du broker Mosquitto
client = mqtt.Client("SensorPublisher")

# Connexion au broker
client.connect(broker_address)

while True:
    sensor_data = random.uniform(0, 100)  # Générer une valeur aléatoire
    client.publish("sensor/data", sensor_data)  # Publier la donnée
    time.sleep(20)  # Attente d'une seconde
