# Yii 2 queue redis docker example

TestJob executes 2 seconds and creates file named as current time with microseconds in `runtime/message` directory.

Clone repository:

```sh
git clone git@github.com:silverslice/yii2-queue-redis-test.git
```

Build docker images:

```sh
make init
```

Start 4 queue workers:

```sh
make up
```

Send 6 test messages (in the second terminal session):

```sh
make send
```

Go to the first terminal session and check queue worker output.

Check `runtime/message` directory to understand how long the jobs were running.

Stop and remove containers after tests:

```sh
make clean
```