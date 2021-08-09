# Developer's app

### Requisitos
- Docker;
- VS Code;
- Terminal WSL

### Instalação
- Clonar o projeto e executar o comando **$ ./_start.sh**

### Aplicação
- Acessar a URL da aplicação **http://localhost/developers**

### Testes
- Executar o comando **$ docker-compose exec app php artisan test**

### APIs
- Fazer download do arquivo **Developer's Api.postman_collection.json**
- Importar a collection no **Postman**
- Api's:
  -  Create developer
  -  Update developer
  -  Delete developer
  -  Get developer
  -  List developers

### Extras
- Uma vez feita a instalação não é mais necessário executar **$ ./_start.sh** 
- Para subir os containers execute somente o comando **$ ./_up.sh**
