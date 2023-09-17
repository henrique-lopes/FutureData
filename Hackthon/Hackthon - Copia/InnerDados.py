import pyodbc
import pandas as pd

# Defina as informações de conexão
server = '34.123.242.73'
database = 'banco_hack'
username = 'teste'
password = '123456'

# Crie uma conexão com o banco de dados
connection = pyodbc.connect('DRIVER={SQL Server};SERVER=' + server + ';DATABASE=' + database + ';UID=' + username + ';PWD=' + password)

# Defina sua consulta SQL
sql_query = "SELECT I.NOME,I.TIPO_PESSOA,I.ID_PESSOA,I.MEDIA_IDADE,I.ESTADO_UF,I.COD_ESTADO_UF,I.VALOR_DIVIDA,I.ATRASO_DIVIDA_DIAS,M.Probabilidade_Nao,M.Probabilidade_sim FROM [dbo].[ImportadaUsuario] as I INNER JOIN [dbo].[intermediaria] as M ON I.ID_PESSOA= M.ID_PESSOA;"

# Execute a consulta e armazene os resultados em um DataFrame
df = pd.read_sql(sql_query, connection)
#print(df)

cnxn = pyodbc.connect('DRIVER={SQL Server};SERVER='+server+';DATABASE='+database+';UID='+username+';PWD='+ password)
cursor = cnxn.cursor()
# Insert Dataframe into SQL Server:
for index, row in df.iterrows():
    cursor.execute("INSERT INTO [dbo].[RESULTADO] (NOME,TIPO_PESSOA,ID_PESSOA,MEDIA_IDADE,ESTADO_UF,COD_ESTADO_UF,VALOR_DIVIDA,ATRASO_DIVIDA_DIAS,Probabilidade_Nao,Problabilidade_sim) VALUES (?,?,?,?,?,?,?,?,?,?)",row.NOME,row.TIPO_PESSOA,row.ID_PESSOA,row.MEDIA_IDADE,row.ESTADO_UF,row.COD_ESTADO_UF,row.VALOR_DIVIDA,row.ATRASO_DIVIDA_DIAS,row.Probabilidade_Nao,row.Probabilidade_sim)
cnxn.commit()
cursor.close()
# Feche a conexão com o banco de dados
connection.close()

print('fim')

