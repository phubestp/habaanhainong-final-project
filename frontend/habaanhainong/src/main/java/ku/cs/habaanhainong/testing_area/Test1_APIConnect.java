package ku.cs.habaanhainong.testing_area;

import ku.cs.habaanhainong.service.APIServices;
import ku.cs.habaanhainong.service.AnimalsAPI;
import org.json.JSONArray;
import org.json.JSONObject;
import org.springframework.web.client.RestTemplate;

import java.util.HashMap;
import java.util.List;

public class Test1_APIConnect {
    public static void main(String[] args) {

//        System.out.println(AnimalsAPI.getAnimals());
//
////        List<HashMap<String, Object>> animals = (List<HashMap<String, Object>>) AnimalsAPI.getAnimals();
//
//        for (HashMap<String, Object> animal : AnimalsAPI.getAnimals()) {
//            System.out.println(animal);
//        }

        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "animals";
        System.out.println(restTemplate.getForObject(resourceUrl, Object.class));
    }
}
