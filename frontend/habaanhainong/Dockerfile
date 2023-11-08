FROM openjdk:11-jdk

# Install Spring Boot dependencies
RUN mvn clean install

# Copy your Spring Boot application files into the container
COPY target/*.jar /app.jar

# Expose the Spring Boot application port
EXPOSE 8080

# Start the Spring Boot application
CMD ["java", "-jar", "/app.jar"]