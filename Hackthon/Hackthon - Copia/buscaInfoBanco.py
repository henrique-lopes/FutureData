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
sql_query = "select top(10) * from [dbo].[treinamento]"  # Substitua 'nome_da_tabela' pelo nome da tabela desejada

# Execute a consulta e armazene os resultados em um DataFrame
df = pd.read_sql(sql_query, connection)

# Feche a conexão com o banco de dados
connection.close()

# Agora você pode usar o DataFrame 'df' para trabalhar com os dados
print(df)  # Isso imprimirá as primeiras linhas do DataFrame
print(df.COLUMNS)




