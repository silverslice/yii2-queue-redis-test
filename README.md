# Yii 2 queue redis docker example

TestJob executes for 2 seconds and creates file named as current time with microseconds in `runtime/message` directory.

Clone repository:

```sh
git clone git@github.com:silverslice/yii2-queue-redis-test.git
cd yii2-queue-redis-test
```

Build docker images and run composer install:

```sh
make init
```

Start 4 queue workers:

```sh
make up queue=4
```

Send 6 test messages (in the second terminal session):

```sh
make send count=6
```

Go to the first terminal session and check queue worker output.

Check `runtime/message` directory to understand how long the jobs were running.

Stop and remove containers after tests:

```sh
make clean
```