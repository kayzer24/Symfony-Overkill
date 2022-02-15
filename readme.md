#Symfony overkill

### to install project run locally

#### install docker images
```bash
    docker-compose up -d
```

#### install composer dependencies
```bash
    docker install
```

#### install npm dependencies
```bash
    npm install
```

### init database and install migrations
```bash
    symfony console make:migration
    symfony console d:m:m -n
```

#### lunch npm server
```bash
    npm run build
```


#### lunch symfony server
```bash
    symfony serve -d
```