using UnityEngine;
using UnityEngine.UI;
using System.Collections;

public class TextWriter : MonoBehaviour
{

    public float letterPause;
    private string message = "Hallo, welkom bij PinAnt! \n Meld je aan met je A-account om te starten! Geen A-account? Druk op registreren om er snel één aan te maken!";
    public Text textComp;
    public GameObject blockPanel;

    // Use this for initialization
    void Start()
    {
        textComp.text = "";
        StartCoroutine(TypeText());
    }
    

    IEnumerator TypeText()
    {
        foreach (char letter in message.ToCharArray())
        {
            int rd = Random.Range(1, 3);
            textComp.text += letter;
                
            yield return 0;
            yield return new WaitForSeconds(letterPause);
        }
        blockPanel.SetActive(false);
    }

    
}