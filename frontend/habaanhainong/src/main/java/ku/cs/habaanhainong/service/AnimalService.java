package ku.cs.habaanhainong.service;

import org.springframework.web.client.RestTemplate;

public class AnimalService {

    public Object getAnimals() {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = "https://habaanhainong-final-project.vercel.app/api/api/animals";
        return restTemplate.getForObject(resourceUrl, Object.class);
    }

}