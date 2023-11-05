package ku.cs.habaanhainong.service;

import org.springframework.http.HttpEntity;
import org.springframework.web.client.RestTemplate;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class AnimalsAPI {
    public static List<HashMap<String, Object>> getAnimals() {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "animals";
        return (List<HashMap<String, Object>>) restTemplate.getForObject(resourceUrl, Object.class);
//        return restTemplate.getForObject(resourceUrl, ArrayList.class);

    }
    public static void addAnimal(HttpEntity<String> req) {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "animals";
        System.out.println(restTemplate.postForObject(resourceUrl,req, Object.class));
    }
}
