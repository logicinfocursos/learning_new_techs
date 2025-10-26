from flask import Flask, render_template
import requests
import os
from dotenv import load_dotenv

load_dotenv()

app = Flask(__name__)

API_URL = os.getenv("API_URL", "http://localhost:7111")
APP_PORT = int(os.getenv("APP_PORT", "8112"))


@app.route("/")
def index():
    response = requests.get(f"{API_URL}/movies")
    movies = response.json()
    return render_template("index.html", movies=movies)


if __name__ == "__main__":
    app.run(port=APP_PORT, debug=True)
