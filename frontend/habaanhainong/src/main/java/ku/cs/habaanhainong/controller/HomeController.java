package ku.cs.habaanhainong.controller;

import ku.cs.habaanhainong.service.AnimalService;
import ku.cs.habaanhainong.service.AnimalTypeService;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import java.util.ArrayList;

@Controller
public class HomeController {
    private final AnimalService animalService = new AnimalService();
    private final AnimalTypeService animalTypeService = new AnimalTypeService();
    @RequestMapping("/")
    public String getHomePage(Model model) {
        ArrayList<Object> animals = (ArrayList<Object>) animalService.getAnimals();
        ArrayList<Object> animalTypes = (ArrayList<Object>) animalTypeService.getAnimalTypes();
        model.addAttribute("animals",animals.subList(0, 3));
        model.addAttribute("animalTypes", animalTypes);
        return "home";
    }
}