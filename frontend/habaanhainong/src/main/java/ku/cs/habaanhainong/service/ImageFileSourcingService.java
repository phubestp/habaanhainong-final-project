package ku.cs.habaanhainong.service;

import org.springframework.web.client.RestTemplate;
import org.springframework.web.multipart.MultipartFile;

import javax.imageio.ImageIO;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardCopyOption;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

public class ImageFileSourcingService {

    public static String baseDirPath = "src/main/resources/static/images/data";

    private static String extractFileExtension(MultipartFile file){
        return extractFileExtension(file.getOriginalFilename());
    }

    private static String extractFileExtension(String fileName){
        return fileName.split("\\.")[ fileName.split("\\.").length - 1 ];
    }

    public static void savePostImage(MultipartFile file){
        savePostImage(file, null);
    }

    public static void savePostImage(MultipartFile file, String postId){
        System.out.println("ImageFileSourcingService[saveImage]: saving file ->" + file.getOriginalFilename());
        String fileExtension = extractFileExtension(file);

        HashMap<String, Object> request = new HashMap<>();
        request.put("file_extension", fileExtension);
        if (postId != null) request.put("post_id", postId);
        HashMap<String, Object> result = PostImageService.addPostImage(request);

        if (result == null) {
            System.out.println("result is null");
            return;
        }

        String imageIdFromDB = (String) result.get("id");

        String dirLocation = String.join(File.separator, baseDirPath, "post-images");
        String fileName = imageIdFromDB + "." + fileExtension;
        try {
            // Copy file to the target location
            Path targetLocation = Paths.get(String.join(File.separator, dirLocation, fileName));
            Files.copy(file.getInputStream(), targetLocation, StandardCopyOption.REPLACE_EXISTING);

            System.out.println("saveImage: " + targetLocation);

        } catch (IOException ex) {
            ex.printStackTrace();
        }

    }

    public static void saveProfileImage(MultipartFile file, String username){
        try {
            BufferedImage inputImage = ImageIO.read(file.getInputStream());

            File outputFile = new File(baseDirPath + "profile-picture/" + username + ".jpg"); // Change to the desired output file path

            ImageIO.write(inputImage, "jpg", outputFile);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public static String getHTMLImageSrcPostImagePath(String postId){
        RestTemplate restTemplate = new RestTemplate();
        List<Map<String, Object>> result = APIServices.getMapList("post-images/get/post/" + postId);
        System.out.println("ImageFileSourcingService[getHTMLImageSrcPostImagePath]: result -> " + result);
        String filename;
        if (result.isEmpty()) filename = "default.jpg";
        else filename = String.join(".", (String) result.get(0).get("id"), (String) result.get(0).get("file_extension"));
        System.out.println("ImageFileSourcingService[getHTMLImageSrcPostImagePath]: filename -> " + filename);
        return "/images/data/post-images/" + filename;
    }

    public static List<Map<String, Object>> getPostImages(){
        RestTemplate restTemplate = new RestTemplate();
        List<Map<String, Object>> result = APIServices.getMapList("post-images/get");
        System.out.println("ImageFileSourcingService[getPostImages]: result -> " + result);
        return result;
    }



}
