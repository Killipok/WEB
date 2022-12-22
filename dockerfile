FROM python:3.7.2-alpine3.8
LABEL maintainer="jeffmshale@gmail.com"

# Install dependencies
RUN apk add --update git

# Set current working directory
WORKDIR /usr/src/my_app_directory

# Copy code from your local context to the image working directory
COPY . .

# Set default value for a variable
ARG my_var=my_default_value

# Set code to run at container run time
ENTRYPOINT ["python", "./app/my_script.py", "my_var"]

# Expose our port to the world
EXPOSE 8000

# Create a volume for data storage
VOLUME /my_volume
