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

#create workflow with Minio

* Lunch minio on port 5678 (docker-compose config)
* Add rabbitmq trigger
* HTTP Request
* Send Email

### Config RabbitMQ Trigger
#### Create Credential for RabbitMQ
* Hostname: rabbitmq
* Port: 5672
* User: guest
* Password: guest
* SSL: off

#### Queue/Topic
the name of created queue (you can check if from rabbitmq interface) 
* messages
#### Add Options
* JSON Parse Body
* Only Content

### Config HTTP Request
* Authentication: None
* Request: GET
* URL: http://imaginary:9000/smartcrop?height=400&width=400&url=http://minio:9000/fichier/{{$json["upload"]}}
* Response Format: File
* Binary Property: image

###Config Send Email

####Credential for SMTP
* User:
* Password:
* Host: mailer
* Port: 1025
* SSL/TLS: off
#### From Email: choose email
####Subject: your subject
####Text: Your message Text
####Attachments: image

### Activate and Save the workflow to execute tasks