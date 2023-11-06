package ku.cs.habaanhainong.service;

import org.json.JSONObject;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpMethod;
import org.springframework.stereotype.Service;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.client.RestTemplate;

@Service
public class AnimalTypeService {
    public Object getAnimalTypes() {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "animals-type";
        return restTemplate.getForObject(resourceUrl, Object.class);
    }

    public static void postAnimalType(HttpEntity<String> req){
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "animals-type";
        System.out.println(restTemplate.postForObject(resourceUrl,req, Object.class));
    }

    public static void deleteAnimalType(String type){
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "animals-type/" + type;
        restTemplate.delete(resourceUrl);
    }




}
