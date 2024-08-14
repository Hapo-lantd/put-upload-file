# Use official Node.js image as a base
FROM node:20

# Set working directory
WORKDIR /app

# Copy application files
COPY . .

# Create a non-root user
RUN useradd -ms /bin/bash ubuntu && chown -R ubuntu:ubuntu /app

# Switch to non-root user
USER ubuntu

# Default command to run at startup
CMD if [ ! -f "package.json" ]; then \
        npx create-react-app .; \
    fi && \
    if [ ! -f "node_modules/.bin/react-scripts" ]; then \
        npm install; \
    fi && \
    npm start
