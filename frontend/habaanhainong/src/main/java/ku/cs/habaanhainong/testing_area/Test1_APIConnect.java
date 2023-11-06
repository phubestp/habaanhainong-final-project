package ku.cs.habaanhainong.testing_area;

import ku.cs.habaanhainong.service.APIServices;
import ku.cs.habaanhainong.service.AnimalsAPI;
import org.json.JSONArray;
import org.json.JSONObject;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.MediaType;
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

//        RestTemplate restTemplate = new RestTemplate();
//        String resourceUrl = APIServices.BASE_URL + "animals";
//        System.out.println(restTemplate.getForObject(resourceUrl, Object.class));

//        JSONObject jsonObject = new JSONObject();
//        jsonObject.put("image_file", "Ote'sImageFile");
//        jsonObject.put("file_extension", "Ote'sFileExtension");
//        String apiUrl = "http://localhost/api/image";
//        HttpHeaders headers = new HttpHeaders();
//        headers.setContentType(MediaType.APPLICATION_JSON);
//        HttpEntity<String> req = new HttpEntity<>(jsonObject.toString(), headers);
//
//        RestTemplate restTemplate = new RestTemplate();
//        System.out.println(restTemplate.postForObject(apiUrl, req, Object.class));


    }
}
