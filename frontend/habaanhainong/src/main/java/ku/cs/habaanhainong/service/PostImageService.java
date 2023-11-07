package ku.cs.habaanhainong.service;

import org.json.JSONObject;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.MediaType;
import org.springframework.web.client.RestTemplate;

import java.util.HashMap;
import java.util.List;

public class PostImageService {

    public static List<HashMap<String, Object>> getPostImages() {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = APIServices.BASE_URL + "post-images/get";
        List<HashMap<String, Object>> result = (List<HashMap<String, Object>>) restTemplate.getForObject(resourceUrl, Object.class);
        return result;
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
        return result;
    }

}
