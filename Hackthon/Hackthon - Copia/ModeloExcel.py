import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import classification_report, confusion_matrix
import pyodbc

# Carregar o conjunto de dados do Excel
data = pd.read_excel("BaseHackthon.xlsx")

# Trazer essas colunas
data = data[['TIPO_PESSOA', 'ID_PESSOA', 'ATRASO_DIVIDA_DIAS', 'MEDIA_IDADE', 'COD_ESTADO_UF', 'VALOR_DIVIDA','PROCESSO']]
data.dropna(inplace=True)

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

# Exemplo de previsão para um novo conjunto de dados
novo_dado = pd.DataFrame({
    "TIPO_PESSOA": [1],  # PJ
    "ID_PESSOA": [42],
    "ATRASO_DIVIDA_DIAS": [3000],
    "MEDIA_IDADE": [7],
    "COD_ESTADO_UF": [23],  # Suponha que 5 corresponda a um estado específico
    "VALOR_DIVIDA": [50000]
})

# Fazer previsões de probabilidade
probabilidades = model.predict_proba(novo_dado)

# Extrair as probabilidades 'Sim' e 'Não' e adicioná-las como colunas
novo_dado['Probabilidade_Nao'] = probabilidades[:, 0]
novo_dado['Probabilidade_Sim'] = probabilidades[:, 1]

# Exibir o DataFrame resultante
df=(novo_dado)
print(df)

# # Defina as informações de conexão
# server = '34.123.242.73'
# database = 'banco_hack'
# username = 'teste'
# password = '123456'

# cnxn = pyodbc.connect('DRIVER={SQL Server};SERVER='+server+';DATABASE='+database+';UID='+username+';PWD='+ password)
# cursor = cnxn.cursor()
# # Insert Dataframe into SQL Server:
# for index, row in df.iterrows():
#     cursor.execute("INSERT INTO [dbo].[intermediaria] (ID_PESSOA, Probabilidade_Nao, Probabilidade_Sim) VALUES (?,?,?)",row.ID_PESSOA, row.Probabilidade_Nao,row.Probabilidade_Sim)
# cnxn.commit()
# cursor.close()

