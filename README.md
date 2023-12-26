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
