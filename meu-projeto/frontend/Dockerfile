FROM node:18

# Definir o diretório de trabalho
WORKDIR /app

# Copiar o package.json e o package-lock.json para o container
COPY package.json package-lock.json ./


# Instalar dependências
RUN npm install

# Copiar os arquivos da aplicação React
COPY . /app

# Expor a porta para o frontend
EXPOSE 3000

# Comando para rodar o servidor de desenvolvimento do React
CMD ["npm", "start"]
