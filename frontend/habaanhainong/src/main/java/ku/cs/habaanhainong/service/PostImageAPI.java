package ku.cs.habaanhainong.service;

import org.json.JSONObject;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.MediaType;
import org.springframework.web.client.RestTemplate;

import java.util.HashMap;
import java.util.List;

public class PostImageAPI {

    public static List<HashMap<String, Object>> getPostImages() {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "post-images/get";
        HashMap<String, Object> result = (HashMap<String, Object>) restTemplate.getForObject(resourceUrl, Object.class);
        boolean is_success = (boolean) result.get("is_success");
        if (!is_success) {
            throw new RuntimeException("PostImageAPI[getPostImages]: is_success is false result -> " + result);
        }
        List<HashMap<String, Object>> data = (List<HashMap<String, Object>>) result.get("data");
        return data;
    }

    public static HashMap<String, Object> addPostImage(HashMap<String, Object> request) {

        JSONObject jsonObject = new JSONObject();


        for (String key : request.keySet()) {
            jsonObject.put(key, request.get(key));
        }

        HttpHeaders headers = new HttpHeaders();
        headers.setContentType(MediaType.APPLICATION_JSON);

        // Create a JSON entity with your JSON object
        HttpEntity<String> req = new HttpEntity<>(jsonObject.toString(), headers);


        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "post-images/add-test";
        HashMap<String, Object> result = (HashMap<String, Object>) restTemplate.postForObject(resourceUrl, req, Object.class);
        boolean is_success = (boolean) result.get("is_success");
        if (!is_success) {
            throw new RuntimeException("PostImageAPI[addPostImage]: is_success is false result -> " + result);
        }
        HashMap<String, Object> data = (HashMap<String, Object>) result.get("data");
        return data;
    }

}
