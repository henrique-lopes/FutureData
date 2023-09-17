import pyodbc
import pandas as pd
import joblib  # Importe a biblioteca joblib para carregar o modelo

# Defina as informações de conexão
server = '34.123.242.73'
database = 'banco_hack'
username = 'teste'
password = '123456'

# Crie uma conexão com o banco de dados
connection = pyodbc.connect('DRIVER={SQL Server};SERVER=' + server + ';DATABASE=' + database + ';UID=' + username + ';PWD=' + password)
# Defina sua consulta SQL
sql_query = "SELECT CASE WHEN TIPO_PESSOA = 'PF' THEN 0 WHEN TIPO_PESSOA = 'PJ' THEN 1 ELSE TIPO_PESSOA END AS TIPO_PESSOA,ID_PESSOA,ATRASO_DIVIDA_DIAS,MEDIA_IDADE,COD_ESTADO_UF,VALOR_DIVIDA FROM [dbo].[ImportadaUsuario]"  
df = pd.read_sql(sql_query, connection)


# Carregar o modelo treinado
loaded_model = joblib.load('modelo_treinado.pkl')  # Substitua pelo nome do seu arquivo de modelo

# Fazer previsões de probabilidade
probabilidades = loaded_model.predict_proba(df) * 100  # Multiplicando por 100 para obter porcentagens
# Extrair as probabilidades 'Sim' e 'Não' e adicioná-las como colunas
df['Probabilidade_Nao'] = probabilidades[:, 0]
df['Probabilidade_Sim'] = probabilidades[:, 1]

print(df)

# # Fazer previsões de probabilidade
# probabilidades = loaded_model.predict_proba(df)
# # Extrair as probabilidades 'Sim' e 'Não' e adicioná-las como colunas
# df['Probabilidade_Nao'] = probabilidades[:, 0]
# df['Probabilidade_Sim'] = probabilidades[:, 1]
# print(df)

cnxn = pyodbc.connect('DRIVER={SQL Server};SERVER='+server+';DATABASE='+database+';UID='+username+';PWD='+ password)
cursor = cnxn.cursor()
# Insert Dataframe into SQL Server:
for index, row in df.iterrows():
    cursor.execute("INSERT INTO [dbo].[intermediaria] (ID_PESSOA, Probabilidade_Nao, Probabilidade_Sim) VALUES (?,?,?)",row.ID_PESSOA, row.Probabilidade_Nao,row.Probabilidade_Sim)
cnxn.commit()
cursor.close()

# print('fim')
