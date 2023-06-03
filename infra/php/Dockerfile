FROM php:8.1-fpm-buster

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
    # Laravelに必要なパッケージインストール
    #  --no-install-recommends：不要なパッケージのインストール防止
    apt-get -y install --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev && \
    # パッケージインストールで使用したキャッシュファイル削除
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    #  PHPの拡張ライブラリインストール
    docker-php-ext-install intl pdo_mysql zip bcmath

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /data