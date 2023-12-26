# AWS CodeBuild for laravel app Example
This is an example of how to use AWS CodeBuild to build a laravel app.

## Description
AWS CodeBuild for docker image build and push to ECR, Example of How to

Goal: Github release tag push -> **AWS CodeBuild** -> Build docker image -> Auto Build and Push to ECR

## AWS CLI
### Docker login for ECR

```bash
export AWS_ACCOUNT_ID=$(aws sts get-caller-identity --query Account --output text) && \
export AWS_DEFAULT_REGION=ap-northeast-1 && \
aws ecr get-login-password --region ${AWS_DEFAULT_REGION} | docker login --username AWS --password-stdin ${AWS_ACCOUNT_ID}.dkr.ecr.${AWS_DEFAULT_REGION}.amazonaws.com
```

## Topics
### Dockerhubの制限
CodeBuild時にベースイメージをパブリック（dockerhub)から取得する場合には制限にひっかかる場合があります。

`buildspect.yml`で dockerhubにログインすることでその制限を回避できる場合もありますが、何度もビルドを短期間で試す場合には制限にひっかかる可能性があります。

基本的にベースイメージは決まっている場合があるので、ECRなどにベースイメージとしてプッシュしておくといいでしょう。

---

### アーキテクチャについて

nginxのように、マルチアーキテクチャーのイメージがありますが、ARM64( Apple Silicon )のアーキテクチャーのホストで `docker pull`を行うと、ARM64のイメージが取得されます。ECSをARM64のインスタンスで構築する場合には問題ありませんが、AMD64のインスタンスで構築する（している）場合には、プラットフォームを明示的に指定してプルしてください。

```bash
docker pull --platform linux/amd64 nginx:1.19.6-alpine
```

---

### ECSでのnginx + php-fpmの構成の場合の注意点
ecsのnginxからphp-fpmに接続する際に、php-fpmのホストの解決ができない。

ローカルや`docker-compose`などで構築した場合、以下のようなphp-fpmとの接続の設定となるが、ECSの場合には`php-app`のホスト名が解決できない。
```
//nginx default.conf

location ~ \.php$ {
        fastcgi_pass php-app:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
```
ECSの場合は以下のように設定する
```
location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000; ←このように設定する
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
```
[config/nginx/default.conf](config/nginx/default.conf)

## Reference
- [AWS ECR](https://docs.aws.amazon.com/cli/latest/reference/ecr/index.html)
- [AWS CodeBuild](https://docs.aws.amazon.com/cli/latest/reference/codebuild/index.html)


