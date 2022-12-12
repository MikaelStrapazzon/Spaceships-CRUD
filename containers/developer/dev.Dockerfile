FROM node:16.17-alpine as node
FROM webdevops/php-apache:8.1-alpine

COPY --from=node / /
