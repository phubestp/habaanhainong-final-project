package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.ImageFileSourcingService;
import ku.cs.habaanhainong.service.PostImageService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.multipart.MultipartFile;

import java.io.File;
import java.util.*;

@Controller
public class UploadImageShowCaseController {
    @RequestMapping("/image")
    public String getImagePage(Model model) {
        List<Map<String, Object>> images = ImageFileSourcingService.getPostImages();
        if (images.isEmpty()) {
            System.out.println("images is empty -> " + images);
            return "uploadimageshowcase";
        }
        Map<String, Object> image = images.get(images.size()-1);
        System.out.println(image);
        System.out.println("/images/data/test/" + String.join(".", (String) image.get("id"), (String) image.get("file_extension")));
        model.addAttribute("imagePath", "/images/data/test" + File.separator + String.join(".", (String) image.get("id"), (String) image.get("file_extension")));
        return "uploadimageshowcase";
    }

    @PostMapping("image/upload")
    public String uploadImage(Model model, @RequestParam("file") MultipartFile file) {
        if (file != null) {

            ImageFileSourcingService.savePostImage(file);

        }
        return "redirect:/image";
    }
}
