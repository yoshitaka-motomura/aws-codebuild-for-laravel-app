# Use the Node.js image as the base
FROM node:latest AS build

# Set the working directory
WORKDIR /app

# Copy package.json and package-lock.json
COPY package*.json ./

# Install dependencies
RUN npm install

# Copy the source code
COPY . .

# Build the application
RUN npm run build

# Use the Nginx image as the base
FROM nginx:1.25.3-alpine

# Copy the built files from the previous stage to the Nginx document root
COPY --from=build /app/dist /var/www/html

COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

# Expose port 80
EXPOSE 80

# Start Nginx
CMD ["nginx", "-g", "daemon off;"]
