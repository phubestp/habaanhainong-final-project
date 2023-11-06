package ku.cs.habaanhainong.service;

import org.json.JSONObject;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.MediaType;
import org.springframework.security.core.Authentication;
import org.springframework.security.core.context.SecurityContextHolder;
import org.springframework.web.client.RestTemplate;

import java.util.HashMap;
import java.util.Objects;

public class PostService {

    public HashMap<String, Object> getPostFromId(String id) {
        RestTemplate restTemplate = new RestTemplate();
        String postUrl = APIServices.BASE_URL + "posts/" + id;
        System.out.println(postUrl);
        HashMap<String, Object> res = new HashMap<>();
        res.put("post", restTemplate.getForObject(postUrl, Object.class));
        String animal_id = (String) Objects.requireNonNull(restTemplate.getForObject(postUrl, HashMap.class)).get("animal_id");
        System.out.println(animal_id);
        String animalUrl = APIServices.BASE_URL + "animals/" + animal_id;
        res.put("animal", restTemplate.getForObject(animalUrl, Object.class));
        return res;
    }

    public void createPost(HashMap<String, String> params){
        RestTemplate restTemplate = new RestTemplate();
        Authentication authentication = SecurityContextHolder.getContext().getAuthentication();

        HttpHeaders headers = new HttpHeaders();
        headers.setContentType(MediaType.APPLICATION_JSON);

        String url = APIServices.BASE_URL + "animals";
        JSONObject newAnimalJson = new JSONObject();
        newAnimalJson.put("name", params.get("name"));
        newAnimalJson.put("breed", params.get("breed"));
        newAnimalJson.put("animal_type", params.get("animal_type"));
        newAnimalJson.put("sex", params.get("sex"));
        HttpEntity<String> req = new HttpEntity<>(newAnimalJson.toString(), headers);
        HashMap animalObject = restTemplate.postForObject(url, req, HashMap.class);
        System.out.println(animalObject.get("id"));

        url = APIServices.BASE_URL + "posts";
        JSONObject newPostJson = new JSONObject();
        System.out.println(authentication.getName());
        newPostJson.put("username", authentication.getName());
        newPostJson.put("title", params.get("title"));
        newPostJson.put("description", params.get("description"));
        newPostJson.put("address", params.get("address"));
        newPostJson.put("animal_id", animalObject.get("id"));
        System.out.println(newPostJson.toString());
        req = new HttpEntity<>(newPostJson.toString(), headers);
        restTemplate.postForObject(url, req, Object.class);
    }
}
