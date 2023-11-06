package ku.cs.habaanhainong.service;

import org.springframework.web.client.RestTemplate;

import java.util.List;

public class AnimalService {

    public Object getAnimals() {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "animals";
        return restTemplate.getForObject(resourceUrl, Object.class);
    }

    public Object getAnimalFromId(String animal_id) {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "animals/" + animal_id;
        return restTemplate.getForObject(resourceUrl, Object.class);
    }

}