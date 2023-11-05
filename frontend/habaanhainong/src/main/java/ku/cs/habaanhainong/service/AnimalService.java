package ku.cs.habaanhainong.service;

import org.springframework.web.client.RestTemplate;

import java.util.List;

public class AnimalService {
    private String api_url = "https://habaanhainong-final-project.vercel.app/api/api/";

    public Object getAnimals() {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = api_url + "animals";
        return restTemplate.getForObject(resourceUrl, Object.class);
    }

}