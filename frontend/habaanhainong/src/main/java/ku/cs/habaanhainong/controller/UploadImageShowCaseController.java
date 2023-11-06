package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.APIServices;
import ku.cs.habaanhainong.service.AnimalsAPI;
import ku.cs.habaanhainong.service.PostImageAPI;
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
import java.net.URI;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardCopyOption;
import java.util.Arrays;
import java.util.Base64;
import java.util.HashMap;
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

            String fileExtension = file.getOriginalFilename().split("\\.")[ file.getOriginalFilename().split("\\.").length - 1 ];

            HashMap<String, Object> request = new HashMap<>();
            request.put("file_extension", fileExtension);
            HashMap<String, Object> result = PostImageAPI.addPostImage(request);

            System.out.println(result);
            System.out.println(result.get("id"));

            String fileName = result.get("id") + "." + fileExtension;
            try {
                // Check if the file's name contains invalid characters
                if (fileName.contains("..")) {
                    // Handle invalid file name
                }

                // Copy file to the target location
                Path targetLocation = Paths.get(fileName);
                Files.copy(file.getInputStream(), targetLocation, StandardCopyOption.REPLACE_EXISTING);

            } catch (IOException ex) {
                ex.printStackTrace();
            }

        }
        return "redirect:/image";
    }
}
