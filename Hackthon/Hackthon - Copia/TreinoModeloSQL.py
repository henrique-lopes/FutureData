import pandas as pd
import pyodbc
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import classification_report, confusion_matrix

# Defina as informações de conexão
server = '34.123.242.73'
database = 'banco_hack'
username = 'teste'
password = '123456'

# Crie uma conexão com o banco de dados
connection = pyodbc.connect('DRIVER={SQL Server};SERVER=' + server + ';DATABASE=' + database + ';UID=' + username + ';PWD=' + password)
# Defina sua consulta SQL
sql_query = "select TIPO_PESSOA,ID_PESSOA,ATRASO_DIVIDA_DIAS,MEDIA_IDADE,COD_ESTADO_UF,VALOR_DIVIDA,PROCESSO from [dbo].[DFTreino]"  
# Execute a consulta e armazene os resultados em um DataFrame
data = pd.read_sql(sql_query, connection)

# Trazer essas colunas
data = data[['TIPO_PESSOA', 'ID_PESSOA', 'ATRASO_DIVIDA_DIAS', 'MEDIA_IDADE', 'COD_ESTADO_UF', 'VALOR_DIVIDA','PROCESSO']]


# Codificar colunas categóricas
data["TIPO_PESSOA"] = data["TIPO_PESSOA"].map({"PF": 0, "PJ": 1})


# Dividir os dados em características (X) e rótulo (y)
X = data[['TIPO_PESSOA', 'ID_PESSOA', 'ATRASO_DIVIDA_DIAS', 'MEDIA_IDADE', 'COD_ESTADO_UF', 'VALOR_DIVIDA']]
y = data['PROCESSO']

# Dividir os dados em conjuntos de treinamento e teste
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Escolher e treinar o modelo
model = RandomForestClassifier(random_state=42)
model.fit(X_train, y_train)

# Avaliar o modelo
y_pred = model.predict(X_test)

print("Matriz de Confusão:\n", confusion_matrix(y_test, y_pred))
print("\nRelatório de Classificação:\n", classification_report(y_test, y_pred))

import joblib

# Salvar o modelo treinado em um arquivo
joblib.dump(model, 'modelo_treinado.pkl')
