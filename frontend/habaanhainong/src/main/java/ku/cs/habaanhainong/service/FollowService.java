package ku.cs.habaanhainong.service;

import org.json.JSONObject;
import org.springframework.http.HttpMethod;
import org.springframework.web.client.RestTemplate;

import java.util.ArrayList;
import java.util.HashMap;

public class FollowService {

    public ArrayList<Object> getFollowersCount() {
        RestTemplate restTemplate = new RestTemplate();
        String url = APIServices.BASE_URL + "posts";
        String jsonString = restTemplate.getForObject(url, String.class);
        String[] lines = jsonString.split("[{}]");
        ArrayList<Object> arrayList = new ArrayList<>();
        for (String line : lines) {
            if (line.contains("\"id\":\"")) {
                int startIndex = line.indexOf("\"id\":\"") + 6;
                int endIndex = line.indexOf("\"", startIndex);
                String idValue = line.substring(startIndex, endIndex);
                url = APIServices.BASE_URL + "followers/" + idValue;
                arrayList.add(restTemplate.getForObject(url, Object.class));
            }
        }
        return arrayList;
    }

    public ArrayList<Object> getIsFollowPosts(String username) {
        RestTemplate restTemplate = new RestTemplate();
        String url = APIServices.BASE_URL + "posts";
        String jsonString = restTemplate.getForObject(url, String.class);
        String[] lines = jsonString.split("[{}]");
        ArrayList<Object> arrayList = new ArrayList<>();
        for (String line : lines) {
            if (line.contains("\"id\":\"")) {
                int startIndex = line.indexOf("\"id\":\"") + 6;
                int endIndex = line.indexOf("\"", startIndex);
                String idValue = line.substring(startIndex, endIndex);
                url = APIServices.BASE_URL + "is-follow/" + username + "/" + idValue;
                arrayList.add(restTemplate.getForObject(url, Object.class));
            }
        }
        return arrayList;
    }

    public void follow(String username, String postId) {
        RestTemplate restTemplate = new RestTemplate();
        String url = APIServices.BASE_URL + "follow/" + username + "/" + postId;
        restTemplate.exchange(url, HttpMethod.POST, null, Object.class);
    }

    public void unfollow(String username, String postId) {
        RestTemplate restTemplate = new RestTemplate();
        String url = APIServices.BASE_URL + "unfollow/" + username + "/" + postId;
        restTemplate.exchange(url, HttpMethod.POST, null, Object.class);
    }
}
