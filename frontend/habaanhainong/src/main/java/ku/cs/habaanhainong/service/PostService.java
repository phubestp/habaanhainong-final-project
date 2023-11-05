package ku.cs.habaanhainong.service;

import org.springframework.web.client.RestTemplate;

import java.util.HashMap;
import java.util.Objects;

public class PostService {

    private String api_url = "https://habaanhainong-final-project.vercel.app/api/api/";
    public HashMap<String, Object> getPostFromId(String id) {
        RestTemplate restTemplate = new RestTemplate();
        String postUrl = api_url + "posts/" + id;
        System.out.println(postUrl);
        HashMap<String, Object> res = new HashMap<>();
        res.put("post", restTemplate.getForObject(postUrl, Object.class));
        String animal_id = (String) Objects.requireNonNull(restTemplate.getForObject(postUrl, HashMap.class)).get("animal_id");
        System.out.println(animal_id);
        String animalUrl =  api_url + "animals/" + animal_id;
        res.put("animal", restTemplate.getForObject(animalUrl, Object.class));
        return res;
    }
}
