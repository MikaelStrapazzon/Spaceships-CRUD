# Desenvolvimento
## <b>Subir containers</b>
### Subir servidor de desenvolvimento
```
sudo sh initDevelopmentServ.sh
```
### Observações
 - Se você <b>não está rodando em localhost</b>, é necessário alterar o campo APP_URL no arquivo .env para o ip da vm
 - Talves seja necessário desativar a proteção do Brave para funcionar a injeção de CSS e JS do Vite (Hot Reload)

## Adicionar svg na aplicação
 - Baixar o svg na pasta resources/icons
 - Atualizar o cache do blade-icons:
    ```
    sudo docker exec nvr-manager php artisan icons:cache
    ```
 - Usar o icone como o componente ```<x-icon-NomeDoSVG />```
