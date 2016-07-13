<?php namespace Laralist\Listcurl;

/**
 * Listcurl Request
 *
 * @package Listcurl
*/

class Request {

	/**
	* ENCODING_* constants, used for specifying encoding options
	*/
	const ENCODING_QUERY = 0;
	const ENCODING_JSON = 1;
	const ENCODING_RAW = 2;

	/**
	 * The HTTP method to use. Defaults to GET.
	 *
	 * @var string
	 */
	private $method = 'get';


	/**
	 * The URL the request is sent to.
	 *
	 * @var string
	 */
	private $url = '';

	/**
	 * The type of processing to perform to encode the POST data
	 *
	 * @var boolean
	 */
	private $encoding = Request::ENCODING_QUERY;
	
	/**
	 * The headers sent with the request.
	 *
	 * @var array
	 */
	private $headers = array();

	/**
	 * POST data sent with the request.
	 *
	 * @var array
	 */
	private $data = array();

	/**
	 * Optional cURL options.
	 *
	 * @var array
	*/
	private $options = array();

	/**
	 * Request constructor
 	 *	
	 * @param cURL $curl
	*/
	public function __construct(Listcurl $curl)
	{
		$this->curl = $curl;
	}

	/**
	 * Set the HTTP method of the request.
	 *
	 * @param string $method
	 */
	public function setMethod($method)
	{
		$method = strtolower($method);
		if (!array_key_exists($method, $this->curl->getAllowedMethods())) {
			throw new \InvalidArgumentException("Method [$method] not a valid HTTP method.");
		}
			$this->method = $method;
		return $this;
	}

	/**
	 * Get the HTTP method of the request.
	 *
	 * @return string
	 */
	public function getMethod()
	{
		return $this->method;
	}

	/**
	 * Set the URL of the request.
	 *
	 * @param string $url
	*/
	public function setUrl($url)
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * Get the URL of the request.
	 *
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Set the headers to be sent with the request.
	 *
	 * Pass an associative array - e.g. ['Content-Type' => 'application/json']
	 * and the correct header formatting - e.g. 'Content-Type: application/json'
	 * will be done for you when the request is sent.
	 *
	 * @param array $headers
	*/
	public function setHeaders(array $headers)
	{
		$this->headers = $headers;
		return $this;
	}

	/**
	 * Get the headers to be sent with the request.
	 *
	 * @return array
	 */
	public function getHeaders()
	{
		return $this->headers;
	}

	/**
	 * Set a specific header to be sent with the request.
	 *
	 * @param string $key
	 * @param mixed $value
	 */
	public function setHeader($key, $value)
	{
		$this->headers[$key] = $value;
		return $this;
	}


	/**
	 * Get a specific header from the request.
	 *
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function getHeader($key)
	{
		return isset($this->headers[$key]) ? $this->headers[$key] : null;
	}

	/**
	 * Format the headers to an array of 'key: val' which can be passed to
	 * curl_setopt.
	 *
	 * @return array
	*/
	public function formatHeaders()
	{
		$headers = array();
		foreach ($this->headers as $key => $val) {
			if (is_string($key)) {
				$headers[] = $key . ': ' . $val;
			} else {
				$headers[] = $val;
			}
		}
		return $headers;
	}


	/**
	 * Set the POST data to be sent with the request.
	 *
	 * @param mixed $data
	 */
	public function setData($data)
	{
		$this->data = $data;
		return $this;
	}


	/**
	 * Get the POST data to be sent with the request.
	 *
	 * @return array
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * Set the cURL options for the request.
	 *
	 * @param array $options
	 */
	public function setOptions(array $options)
	{
		$this->options = $options;
		return $this;
	}


	/**
	 * Get the cURL options for the request.
	 *
	 * @return array
	 */
	public function getOptions()
	{
		return $this->options;
	}

	/**
	 * Encode the POST data as a string.
	 *
	 * @return string
	 */
	public function encodeData()
	{
		switch ($this->encoding) {
			case Request::ENCODING_JSON:
				return json_encode($this->data);
				break;

			case Request::ENCODING_RAW:
				return (string) $this->data;
				break;

			case Request::ENCODING_QUERY:
				return http_build_query($this->data);
				break;

			default:
				throw new \UnexpectedValueException("Encoding [$encoding] not a known Request::ENCODING_* constant");	
		}
	}


	/**
	 * Set the encoding to use on the POST data, and (possibly) associated Content-Type headers
	 *
	 * @param int $encoding a Request::ENCODING_* constant
	 */
	public function setEncoding($encoding)
	{
		$encoding = intval($encoding);
		if ($encoding !== REQUEST::ENCODING_QUERY && $encoding !== REQUEST::ENCODING_JSON && $encoding !== REQUEST::ENCODING_RAW) {
			throw new \InvalidArgumentException("Encoding [$encoding] not a known Request::ENCODING_* constant");
		}
		if ($encoding === Request::ENCODING_JSON && !$this->getHeader('Content-Type')) {
			$this->setHeader('Content-Type', 'application/json');
		}
			$this->encoding = $encoding;
		return $this;
	}

	/**
	 * Get the current encoding which will be used on the POST data
	 */
	public function getEncoding()
	{
		return $this->encoding;
	}

	/**
	 * Send the request.
	 *
	 * @return mixed
	*/
	public function send()
	{
		return $this->curl->sendRequest($this);
	}




}