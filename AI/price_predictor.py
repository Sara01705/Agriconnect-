from flask import Flask, request, jsonify
import pandas as pd
from sklearn.linear_model import LinearRegression

app = Flask(__name__)

# Sample training data
data = {
    "demand":[10,20,30,40,50],
    "price":[20,22,25,27,30]
}

df = pd.DataFrame(data)

X = df[["demand"]]
y = df["price"]

model = LinearRegression()
model.fit(X,y)

@app.route('/predict', methods=['GET'])
def predict():

    demand = int(request.args.get("demand"))

    predicted_price = model.predict([[demand]])[0]

    return jsonify({
        "predicted_price": round(predicted_price,2)
    })

if __name__ == "__main__":
    app.run(port=3307)