# Promo Engine 🚀

Sistema de automação de promoções desenvolvido com Laravel, Docker, n8n e Telegram.

O objetivo do projeto é receber ofertas de diferentes marketplaces, processá-las, validar duplicidades, formatar mensagens e publicar automaticamente em grupos ou canais do Telegram.

---

## Arquitetura

```text
Coletor
   ↓
Laravel
   ↓
n8n
   ↓
Laravel (Processamento)
   ↓
MySQL
   ↓
Telegram
```

### Fluxo Completo

```text
Cliente/API
      ↓
POST /api/coletor/ofertas
      ↓
Laravel (Coletor)
      ↓
Webhook n8n
      ↓
Laravel (Processador)
      ↓
Validação
      ↓
Controle de duplicidade
      ↓
Telegram
```

---

## Tecnologias Utilizadas

* PHP 8.3
* Laravel 13
* MySQL 8
* Docker
* Docker Compose
* n8n
* Telegram Bot API

---

## Funcionalidades

### Coleta de Ofertas

Recebe ofertas através de endpoint REST:

```http
POST /api/coletor/ofertas
```

### Validação

Valida:

* Marketplace
* Produto
* URL
* Preços
* Cupons

### Controle de Duplicidade

Evita publicações repetidas do mesmo produto e marketplace durante um período de 24 horas.

### Publicação Automática

Integração com Telegram via n8n para envio automático de promoções.

### Dockerização

Todo o ambiente pode ser executado através do Docker Compose.

---

## Estrutura do Projeto

```text
app/
├── Http/
├── Models/
├── Services/

routes/
├── api.php

database/
├── migrations/

docker-compose.yml
Dockerfile
```

---

## Configuração

### Clone o projeto

```bash
git clone https://github.com/seu-usuario/promo-engine.git

cd promo-engine
```

### Crie o arquivo .env

```bash
cp .env.example .env
```

Configure as variáveis:

```env
APP_NAME=PromoEngine

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306

DB_DATABASE=promocao
DB_USERNAME=triovendas
DB_PASSWORD=sua_senha

DB_ROOT_PASSWORD=sua_senha_root

N8N_WEBHOOK_OFERTAS_URL=http://n8n:5678/webhook/ofertas
```

---

## Executando com Docker

Subir containers:

```bash
docker compose up --build -d
```

Executar migrations:

```bash
docker compose exec app php artisan migrate
```

Verificar containers:

```bash
docker compose ps
```

---

## Endpoints

### Coletor de Ofertas

```http
POST /api/coletor/ofertas
```

Exemplo:

```json
{
  "marketplace": "amazon",
  "produto_id": "123456",
  "titulo": "Produto Teste",
  "produto_url": "https://example.com/produto",
  "preco_original": 199.90,
  "preco_atual": 149.90,
  "tem_cupom": true,
  "cupom_codigo": "PROMO20"
}
```

---

### Processamento Interno

```http
POST /api/ofertas/processar
```

Responsável por:

* Validar oferta
* Verificar duplicidade
* Gerar mensagem
* Autorizar publicação

---

## Exemplo de Mensagem

```text
Echo Dot 5ª Geração

De R$399,00 | Por R$279,00 💰

🛒 Achado no Amazon

👉 https://amazon.com.br/produto
```

---

## Workflow n8n

```text
Webhook
   ↓
HTTP Request
   ↓
IF
   ↓
Set
   ↓
Telegram
```

---

## Próximos Passos

* Integração real com Amazon
* Integração real com Mercado Livre
* Logs de publicação
* Dashboard administrativo
* Sistema de filas
* Múltiplos canais de publicação
* IA para geração de textos promocionais
* Monitoramento e métricas

---

## Autor

Rodrigo Pepato

Desenvolvido para estudo de integrações, automação de processos, Docker, Laravel e n8n.
