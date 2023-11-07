package ku.cs.habaanhainong.service;

import org.springframework.http.HttpEntity;
import org.springframework.web.client.RestTemplate;

import java.util.List;
import java.util.Map;

public class APIServices {

    public static final String BASE_URL
            = "http://localhost/api/";

    public static List<Object> getObjectList(String url) {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = BASE_URL + url;
        return (List<Object>) restTemplate.getForObject(resourceUrl, Object.class);
    }

    public static List<Map<String, Object>> getMapList(String url) {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = BASE_URL + url;
        return (List<Map<String, Object>>) restTemplate.getForObject(resourceUrl, Object.class);
    }

    public static Object getObject(String url) {
        RestTemplate restTemplate = new RestTemplate();
        String resourceUrl = BASE_URL + url;
        return (Object) restTemplate.getForObject(resourceUrl, Object.class);
    }



}
