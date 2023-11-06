package ku.cs.habaanhainong.service;

import org.springframework.web.multipart.MultipartFile;

import java.io.File;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardCopyOption;
import java.util.HashMap;

public class ImageFileSourcingService {

    public static String baseDirPath = "src/main/resources/static/images/data";

    private static String extractFileExtension(MultipartFile file){
        return extractFileExtension(file.getOriginalFilename());
    }

    private static String extractFileExtension(String fileName){
        return fileName.split("\\.")[ fileName.split("\\.").length - 1 ];
    }

    public static void saveTestImage(MultipartFile file){
        String fileExtension = extractFileExtension(file);

        HashMap<String, Object> request = new HashMap<>();
        request.put("file_extension", fileExtension);
        HashMap<String, Object> result = PostImageService.addPostImage(request);

        String imageIdFromDB = (String) result.get("id");

        String dirLocation = String.join(File.separator, baseDirPath, "test");
        String fileName = imageIdFromDB + "." + fileExtension;
        try {

            // Copy file to the target location
            Path targetLocation = Paths.get(String.join(File.separator, dirLocation, fileName));
            Files.copy(file.getInputStream(), targetLocation, StandardCopyOption.REPLACE_EXISTING);

        } catch (IOException ex) {
            ex.printStackTrace();
        }
    }



}
