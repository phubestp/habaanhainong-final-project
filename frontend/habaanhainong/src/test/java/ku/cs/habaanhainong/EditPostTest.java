package ku.cs.habaanhainong;

import io.github.bonigarcia.wdm.WebDriverManager;
import org.junit.jupiter.api.*;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.FindBy;
import org.openqa.selenium.support.PageFactory;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.boot.test.web.server.LocalServerPort;

import java.time.Duration;
import java.util.List;

import static org.junit.jupiter.api.Assertions.assertEquals;

@SpringBootTest(webEnvironment = SpringBootTest.WebEnvironment.RANDOM_PORT)
public class EditPostTest {
    @LocalServerPort
    private Integer port;

    private static WebDriver driver;
    private static WebDriverWait wait;

    @FindBy(id = "username") private WebElement usernameField;
    @FindBy(id = "password") private WebElement passwordField;

    @FindBy(id = "title") private WebElement titleField;
    @FindBy(id = "description") private WebElement descriptionField;
    @FindBy(id = "name") private WebElement nameField;
    @FindBy(id = "type") private WebElement typeField;
    @FindBy(id = "sex") private WebElement sexField;
    @FindBy(id = "breed") private WebElement breedField;
    @FindBy(id = "address") private WebElement addressField;
    @FindBy(id = "submitButton") private WebElement submitButton;


    @BeforeAll
    public static void beforeAll() {
        WebDriverManager.chromedriver().setup();
        driver = new ChromeDriver();
        wait = new WebDriverWait(driver, Duration.ofSeconds(1));
    }

    @BeforeEach
    public void beforeEach() {
        driver.get("http://localhost:" + port + "/login");
        PageFactory.initElements(driver, this);
    }

    @AfterEach
    public void afterEach() throws InterruptedException {
        Thread.sleep(3000);
    }

    @AfterAll
    public static void afterAll() {
        if (driver != null)
            driver.quit();
    }

    @Test
    void testCreatePost() {

        usernameField.sendKeys("Usertester");
        passwordField.sendKeys("password1234");
        submitButton.click();

        driver.get("http://localhost:" + port + "/my-post");

        WebElement edit = driver. findElement(By.xpath("//*[text()='แก้ไข'][1]"));
        edit.click();

        titleField.clear();
        titleField.sendKeys("หาบ้านนนนนนนนนน");
        submitButton.click();

        driver.get("http://localhost:" + port + "/my-post");
        WebElement title = driver.findElement(By.xpath("//*[text()='หาบ้านนนนนนนนนน']"));
        assertEquals("หาบ้านนนนนนนนนน", title.getText());
    }
}

