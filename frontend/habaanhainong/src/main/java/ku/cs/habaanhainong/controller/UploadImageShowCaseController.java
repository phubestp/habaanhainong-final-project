package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.APIServices;
import ku.cs.habaanhainong.service.AnimalsAPI;
import ku.cs.habaanhainong.service.ImageFileSourcingService;
import ku.cs.habaanhainong.service.PostImageAPI;
import org.json.JSONObject;
import org.springframework.http.HttpEntity;
import org.springframework.http.HttpHeaders;
import org.springframework.http.MediaType;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.client.RestTemplate;
import org.springframework.web.multipart.MultipartFile;

import java.io.File;
import java.io.IOException;
import java.net.URI;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardCopyOption;
import java.util.*;

@Controller
public class UploadImageShowCaseController {
    @RequestMapping("/image")
    public String getImagePage(Model model) {
        List<HashMap<String, Object>> images = PostImageAPI.getPostImages();
        HashMap<String, Object> image = images.get(images.size()-1);
        System.out.println(image);
        System.out.println("data/test" + File.separator + String.join(".", (String) image.get("id"), (String) image.get("file_extension")));
        model.addAttribute("imagePath", "data/test" + File.separator + String.join(".", (String) image.get("id"), (String) image.get("file_extension")));
        return "uploadimageshowcase";
    }

    @PostMapping("image/upload")
    public String uploadImage(Model model, @RequestParam("file") MultipartFile file) {
        if (file != null) {

            ImageFileSourcingService.saveTestImage(file);

        }
        return "redirect:/image";
    }
}
