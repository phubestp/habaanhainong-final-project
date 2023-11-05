package ku.cs.habaanhainong.service;

import org.springframework.web.client.RestTemplate;

public class AnimalTypeService {

    public Object getAnimalTypes() {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = "https://habaanhainong-final-project.vercel.app/api/api/animals-type";
        return restTemplate.getForObject(resourceUrl, Object.class);
    }

}
