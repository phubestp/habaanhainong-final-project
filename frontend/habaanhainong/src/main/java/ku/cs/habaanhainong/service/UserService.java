package ku.cs.habaanhainong.service;

import org.json.JSONObject;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.HttpMethod;
import org.springframework.http.MediaType;
import org.springframework.web.client.RestTemplate;

import java.util.HashMap;

public class UserService {
    public void editProfile(HashMap<String, String> params,String username) {
        RestTemplate restTemplate = new RestTemplate();
        System.out.println(params);
        String url = APIServices.BASE_URL + "edit-profile/" + username;
        JSONObject jsonObject = new JSONObject();
        jsonObject.put("firstname", params.get("firstname"));
        jsonObject.put("lastname", params.get("lastname"));
        jsonObject.put("phone_no", params.get("phone_no"));
        jsonObject.put("facebook", params.get("facebook"));
        jsonObject.put("instagram", params.get("instagram"));
        jsonObject.put("line", params.get("line"));
        HttpHeaders headers = new HttpHeaders();
        headers.setContentType(MediaType.APPLICATION_JSON);

        HttpEntity<String> req = new HttpEntity<>(jsonObject.toString(), headers);
        restTemplate.exchange(url, HttpMethod.PUT, req, Object.class);
    }
}
