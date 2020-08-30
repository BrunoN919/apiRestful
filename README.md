# API REST
API Restful.

PHP ver 7.4.3
Lumen ver 7.2.1

## Comandos Necessários antes da excução do projeto
```
php artisan db:seed
php artisan migrate:install
php artisan migrate
```
## Executar Projeto
```
php -S 127.0.0.1:8000 -t public
```

## Rotas de Exemplo

### Rotas de Clientes
#### Metodo GET
Rota para visualizar lista de clientes:
```
http://localhost:8000/clientes
```

#### Rota para registro de novos clientes(Requer JSON: nome, email, telefone, data de nascimento, endereço, complemento, bairro, cep):
##### Metodo POST
Exemplo:
```
{
	"nome":"Bruno",
	"email":"bruno@exemplo.com",
	"data de nascimento":14/01/1998,
	"endereço":"Rua Exemplo",
	"complemento": "Bl 01 Apt 1",
	"bairro":"Interlagos",
	"cep":"04438000"
}
```
Exemplo de Rota:
```
http://localhost:8000/clientes
```

#### Rotas para visualizar Cliente por ID:
##### Metodo GET
Exemplo de Rota:
```
http://localhost:8000/cliente/$id
```
Exemplo:
```
http://localhost:8000/cliente/1
```

#### Rota para dar update em um cliente da lista por ID:
##### Metodo PUT
Exemplo de Rota:
```
http://localhost:8000/clientes/$id
```
Exemplo:
```
http://localhost:8000/clientes/1
```

#### Rota para deletar um cliente por ID:
##### Metodo DELETE
Exemplo de Rota:
```
http://localhost:8000/clientes/$id
```
Exemplo:
```
http://localhost:8000/clientes/1
```


### Rotas de Pasteis
#### Rota para registro de novos pasteis(Requer JSON: nome, preço, foto):
##### Metodo POST
Exemplo:
```
{
	"nome":"Pastel de Carne",
	"preco":9.99,
	"foto":fileupload
}
```
Exemplo de Rota:
```
http://localhost:8000/pasteis
```

#### Rotas para visualizar pasteis por ID:
##### Metodo GET
Exemplo de Rota:
```
http://localhost:8000/pasteis/$id
```
Exemplo:
```
http://localhost:8000/pasteis/1
```

#### Rota para dar update em um pasteis da lista por ID:
##### Metodo PUT
Exemplo de Rota:
```
http://localhost:8000/pasteis/$id
```
Exemplo:
```
http://localhost:8000/pasteis/1
```

#### Rota para deletar um pasteis por ID:
##### Metodo DELETE
Exemplo de Rota:
```
http://localhost:8000/pasteis/$id
```
Exemplo:
```
http://localhost:8000/pasteis/1
```

### Rotas de Pedidos
#### Rota para registro de novos pedidos(Requer JSON: codigo do pedido, codigo do cliente):
##### Metodo POST
Exemplo:
```
{
	"codigoDoCliente":1,
	"codigoDoPedido":99,
}
```
Exemplo de Rota:
```
http://localhost:8000/pasteis
```

#### Rotas para visualizar Pedido por ID:
##### Metodo GET
Exemplo de Rota:
```
http://localhost:8000/pasteis/$id
```
Exemplo:
```
http://localhost:8000/pasteis/1
```

#### Rota para dar update em um pedido da lista por ID:
##### Metodo PUT
Exemplo de Rota:
```
http://localhost:8000/pasteis/$id
```
Exemplo:
```
http://localhost:8000/pasteis/1
```

#### Rota para deletar um pedido por ID:
##### Metodo DELETE
Exemplo de Rota:
```
http://localhost:8000/pasteis/$id
```
Exemplo:
```
http://localhost:8000/pasteis/1
```
