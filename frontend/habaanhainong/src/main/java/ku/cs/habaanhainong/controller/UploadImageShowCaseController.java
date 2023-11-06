package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.APIServices;
import ku.cs.habaanhainong.service.AnimalsAPI;
import org.json.JSONObject;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.MediaType;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.client.RestTemplate;
import org.springframework.web.multipart.MultipartFile;

import java.io.IOException;
import java.util.Arrays;
import java.util.Base64;
import java.util.Map;

@Controller
public class UploadImageShowCaseController {
    @RequestMapping("/image")
    public String getImagePage(Model model) {
//        System.out.println(AnimalsAPI.getAnimals());
//        model.addAttribute("animals", AnimalsAPI.getAnimals());
        // ต้องคืนค่าเป็นชื่อไฟล์ html template โดยในเมธอดนี้ คืนค่าเป็น home.html+
        return "uploadimageshowcase";
    }

    @PostMapping("image/upload")
    public String uploadImage(Model model, @RequestParam("file") MultipartFile file) {
        if (file != null) {

            JSONObject jsonObject = new JSONObject();

            String fileExtension = file.getOriginalFilename();

            // Create a JSON object with your data
            jsonObject.put("file_name", fileExtension);

            String apiUrl = "http://localhost/api/image";
            HttpHeaders headers = new HttpHeaders();
            headers.setContentType(MediaType.APPLICATION_JSON);

            // Create a JSON entity with your JSON object
            HttpEntity<String> req = new HttpEntity<>(jsonObject.toString(), headers);

            RestTemplate restTemplate = new RestTemplate();
            System.out.println(restTemplate.postForObject(apiUrl, req, Object.class));

        }

//        if (file != null) {
//            try {
//                JSONObject jsonObject = new JSONObject();
//                byte[] fileBytes = file.getBytes();
//                String fileExtension = file.getOriginalFilename().split("\\.")[1];
//
//                // Create a JSON object with your data
//                jsonObject.put("image_file", Base64.getEncoder().encodeToString(fileBytes));
//                jsonObject.put("file_extension", fileExtension);
//
//                String apiUrl = "http://localhost/api/image";
//                HttpHeaders headers = new HttpHeaders();
//                headers.setContentType(MediaType.APPLICATION_JSON);
//
//                // Create a JSON entity with your JSON object
//                HttpEntity<String> req = new HttpEntity<>(jsonObject.toString(), headers);
//
//                RestTemplate restTemplate = new RestTemplate();
//                restTemplate.postForObject(apiUrl, req, Object.class);
//            } catch (IOException e) {
//                // Handle the exception
//                throw new RuntimeException(e);
//            }
//        }

//        JSONObject jsonObject = new JSONObject();
//
//        jsonObject.put("name", params.get("name"));
//        jsonObject.put("animal_type", params.get("animal_type"));
//        jsonObject.put("breed", params.get("breed"));
//        jsonObject.put("sex", params.get("sex"));
//
//        HttpHeaders headers = new HttpHeaders();
//        headers.setContentType(MediaType.APPLICATION_JSON);
//
//        HttpEntity<String> req = new HttpEntity<>(jsonObject.toString(), headers);
//        AnimalsAPI.addAnimal(req);
        return "redirect:/image";
    }
}
